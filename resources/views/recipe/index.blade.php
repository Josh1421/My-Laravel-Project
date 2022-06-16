<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <title></title>
</head>
<style>
  .scrollable {
		height: 200px;
		overflow: scroll;
	}
  
</style>
<body class="py-4" style="background-color: #F0FFFF;">
<div class="container">

    <h2>JoshBlox Cookbook Test</h2>
    <form action="Recipe/create_recipe" method="POST">
      @csrf
    	<div class="form-group">
    		<!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          + New Recipe
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Recipe</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <label for="recipe_name" class="form-label"><b>Name:</b></label>
								<input type="text" class="form-control  @error('recipe_name') is-invalid @enderror" name="recipe_name" id="recipe_name" value="{{ old('recipe_name') }}" autocomplete="off" autofocus>

                <div class="container my-3">
                  <div class="row">
                    <label><b>Ingredients:</b></label>
                    <div class="col-6 scrollable">
                      @foreach ($ingredients as $ingredient)
                        <div class="form-check">
                          <input class="form-check-input" name="recipe_ingredients[]" type="checkbox" value="{{$ingredient->ingredient}}" id="{{$ingredient->id}}">
                          <label class="form-check-label" for="flexCheckDefault">{{$ingredient->ingredient}}</label>
                        </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Create Recipe</button>
              </div>
            </div>
          </div>
        </div>
    	</div>
    </form>

    <div class="container">
      <div class="row">
        <table class="table my-3">
          <thead>
            <tr>
              <th scope="col">Recipe Name</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($recipes as $recipe )
              <tr>
                <td><b>{{ $recipe->recipe_name}}</b></td>
                <td>
                  <div class="d-flex">
                    <div class="pe-2">
                        <button type="submit" id="{{$recipe->id}}" recipe_ingredients="{{$recipe->recipe_name}}" class="btn btn-success btn-sm cook_now">Cook Now!</button>
                    </div>
                    <div>
                      <form action="/Recipe/{{$recipe->id}}/{{$recipe->recipe_name}}/delete" method="get">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                      </form>
                    </div>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        {{ $recipes->links() }}
      </div>
      <div class="row my-2">
          <h5>Current Recipe: <b id="current_recipe"></b></h5>
          <div class="recipe_body px-0 scrollable" id="recipe_body" style="height:290px;">
            <div class="remove_id" id="remove_id">
              
            </div>
          </div>
      </div>
    </div>
</div>
<script type="application/javascript">
  $(document).ready(function(){
    $('.cook_now').click(function(){
      var id = $(this).attr('id');
      var recipe_ingredients = $(this).attr('recipe_ingredients');
      
      $.ajax({
        type: "GET",
        url: "/Recipe/cook_now/{id}",
        data: {
          id: id,
          recipe_ingredients: recipe_ingredients
        },
        success: function (response) {
          console.log(response.id);
          console.log(response.recipe_ingredients);
          document.getElementById("current_recipe").innerHTML = response.id.recipe_name;
          var element = document.getElementById("remove_id");
          element.remove();
          document.getElementById("recipe_body").innerHTML = '<div class="remove_id" id="remove_id"></div>';
          $.each(response.recipe_ingredients, function (key, items){
            if (items.checked === '0'){
              $(".remove_id").append(
                '<label for="'+items.id+'" class="form-check border border-dark rounded p-2 mb-2 bg-white" id="'+items.id+items.id+'">\
                  <b>\
                    <input class="form-check-input ms-3 check-boxed" name="check-box" type="checkbox" value="'+items.ingredient_name+'" checked-box="'+items.id+'" id="'+items.id+'">\
                    <label for="'+items.id+'" class="form-check-label ps-1 display-7 text-dark" for="flexCheckDefault" id="'+items.id+items.id+items.id+'">'+items.ingredient_name+'</label>\
                  </b>\
                </label>'
              );
            }
            else if (items.checked === '1'){
              $(".remove_id").append(
                '<label for="'+items.id+'" class="form-check border border-dark rounded p-2 mb-2 bg-primary" id="'+items.id+items.id+'">\
                  <b>\
                    <input class="form-check-input ms-3 check-boxed" name="check-box" type="checkbox" value="'+items.ingredient_name+'" checked-box="'+items.id+'" id="'+items.id+'" checked>\
                    <label for="'+items.id+'" class="form-check-label ps-1 display-7 text-white" for="flexCheckDefault" id="'+items.id+items.id+items.id+'">'+items.ingredient_name+'</label>\
                  </b>\
                </label>'
              );
            }

          });
          console.log(response.id.recipe_name);
          $(".check-boxed").click(function(e){
            var ingredient_idss = $(this).attr('checked-box');
            console.log(ingredient_idss); 
            $.ajax({
              type: "GET",
              url: "/Recipe/recipe/{ingredient_idss}",
              data: {
                ingredient_idss: ingredient_idss
              },
              success: function (response) {
                console.log(response.res);
                if (response.res === 1){
                  var element = document.getElementById(ingredient_idss+ingredient_idss);
                  var text_element = document.getElementById(ingredient_idss+ingredient_idss+ingredient_idss);
                  element.classList.remove("bg-white");
                  element.classList.add("bg-primary");
                  text_element.classList.remove("text-dark");
                  text_element.classList.add("text-white");
                  console.log(element);
                }
                else if (response.res === 0){
                  var element = document.getElementById(ingredient_idss+ingredient_idss);
                  var text_element = document.getElementById(ingredient_idss+ingredient_idss+ingredient_idss);
                  element.classList.remove("bg-primary");
                  element.classList.add("bg-white");
                  text_element.classList.remove("text-white");
                  text_element.classList.add("text-dark");
                  console.log(elements);
                }
              }
            });
          });
        }
      });
      
    });
  });
</script>
</body>
</html>

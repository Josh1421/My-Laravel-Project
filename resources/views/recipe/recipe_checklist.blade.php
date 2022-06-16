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
  <title></title>
</head>
<style>
  .scrollable {
		height: 200px;
		overflow: scroll;
	}
</style>
<body class="py-4">
<div class="container">

    <h2>JoshBlox Cookbook Test</h2>
    <form action="/Recipe/create_recipe" method="POST">
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
								<input type="text" class="form-control  @error('recipe_name') is-invalid @enderror" name="recipe_name" id="recipe_name" value="{{ old('recipe_name') }}" autocomplete="recipe_name" autofocus>

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
                <td>{{ $recipe->recipe_name}}</td>
                <td>
                  <div class="d-flex">
                    <div class="pe-2">
                      <form action="/Recipe/{{$recipe->id}}/{{$recipe->recipe_name}}/cook_now" method="get">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm">Cook Now!</button>
                      </form>
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
      <div class="row my-5">
          <h4>Current Recipe "{{$cook_recipee->recipe_name}}"</h4>
      </div>
    </div>
</div>
</body>
</html>

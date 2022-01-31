<!-- 
method post

name
image
description
price -->




<form method="post" >
  <div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
    
      <input
        type="text"
        name="name"
        class="form-control-plaintext"
        placeholder="nom vélo"
      />


      <div class="form-group">
    <label for="description" class="form-label mt-4">Description</label>
    <textarea class="form-control" name="description" rows="3"></textarea>



  </div>
    </div>
    <label for="image" class="col-sm-2 col-form-label">image</label>
    <div class="col-sm-10">
      <input
        type="text"
        name="image"
        class="form-control-plaintext"
        placeholder="url image ?"
      />
    </div>
    <label for="price" class="col-sm-2 col-form-label">Price</label>
    <div class="col-sm-10">
      <input
        type="number"
        name="price"
        class="form-control-plaintext"
        
      />
    </div>



  </div>





  <button class="btn btn-outline-warning mt-5" type="submit"
  action=""> CREATE</button>
</form>

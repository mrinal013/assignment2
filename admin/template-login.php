<?php
get_header();
?>
<div class="container">
<form>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address *</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password *</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary" id="submit-form">Submit</button>
</form>
</div>
<?php
get_footer();
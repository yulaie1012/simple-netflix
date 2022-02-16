<?php
require_once("includes/header.php");
?>
<div class="text-box-container">
  <input type="text" class="search-input" placeholder="Search for something" />
</div>
<div class="results"></div>
<script>
$(function () {
  const username = "<?php echo $userLoggedIn ?>";
  let timer;

  $(".search-input").keyup(function () {
    clearTimeout(timer);

    timer = setTimeout(function () {
      const keyword = $(".search-input").val();
      
      if (keyword !== "") {
        $.post("ajax/getSearchResults.php", { keyword, username }, function (data) {
          $(".results").html(data);
        });
      } else {
        $(".results").html("");
      }
    }, 500)
  })
})
</script>

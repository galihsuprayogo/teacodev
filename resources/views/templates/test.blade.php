<html lang="en">
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	  <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
	</head>
	<body>
		<div id="test-list">
    <input type="text" class="fuzzy-search" />
    <ul class="list">
      <li><p class="name">Guybrush Threepwood</p></li>
      <li><p class="name">Elaine Marley</p></li>
      <li><p class="name">LeChuck</p></li>
      <li><p class="name">Stan</p></li>
      <li><p class="name">Voodoo Lady</p></li>
      <li><p class="name">Herman Toothrot</p></li>
      <li><p class="name">Meathook</p></li>
      <li><p class="name">Carla</p></li>
      <li><p class="name">Otis</p></li>
      <li><p class="name">Rapp Scallion</p></li>
      <li><p class="name">Rum Rogers Sr.</p></li>
      <li><p class="name">Men of Low Moral Fiber</p></li>
      <li><p class="name">Murray</p></li>
      <li><p class="name">Cannibals</p></li>
    </ul>
  </div>

  <script type="text/javascript">
  		var monkeyList = new List('test-list', { 
		  valueNames: ['name']
		  });
  </script>
	</body>
</html>
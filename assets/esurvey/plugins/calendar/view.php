
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="aicon/style.css">
<link rel="stylesheet" href="css/jquery-pseudo-ripple.css">
  <link rel="stylesheet" href="css/jquery-nao-calendar.css">
  <style>
    body { font-family: 'Roboto'; background-color: #fafafa;}
    .container { margin: 150px auto; max-width: 480px; }
    .myCalendar.nao-month td {
  padding: 15px;
}
.myCalendar .month-head>div,
.myCalendar .month-head>button {
  padding: 15px;
}
  </style>
  <div class="container">
    <div class="myCalendar"></div>
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-vk5WoKIaW/vJyUAd9n/wmopsmNhiy+L2Z+SBxGYnUkunIxVxAv/UtMOhba/xskxh" crossorigin="anonymous"></script>
  <script src="jquery-pseudo-ripple.js"></script>
  <script src="jquery-nao-calendar.js"></script>
  <script>
    $('.myCalendar').calendar({
  date: new Date(),
  autoSelect: false, // false by default
  select: function(date) {
    console.log('SELECT', date)
  },
  toggle: function(y, m) {
    console.log('TOGGLE', y, m)
  }
})
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

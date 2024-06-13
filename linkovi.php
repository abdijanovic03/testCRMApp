<?php
require_once 'includes/header.php';
require_once 'includes/functions.php';
?>
<script>
  $(document).ready(function() {
    $('#tabela_skole').DataTable();
  });
</script>

<div class="container">
  <div class="row text-center">

    <h1>
      Lista linkova
    </h1>
    <table id="tabela_skole">
      <thead>
        <td>SB</td>
        <td>Naziv linka</td>
        <td>Broj kandidata po linku</td>

        <td></td>
      </thead>
      <?php
      $link = mysqli_query($conn, "select id,naziv_linka from linkovi ");
      while ($link1 = mysqli_fetch_array($link)) {
      ?>
        <tr scope="row">
          <td> <?php echo $link1['id'] ?> </td>
          <td> <?php echo $link1['naziv_linka'] ?> </a></td>
          <td> <?php
                brKanLink($link1['id']);
                ?> </td>
          <td>
            <div class="dropdown">
              <a class="btn btn-primary dropdown-toggle " style="float: right;" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                Uređuj
              </a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li> <a class="dropdown-item" href="includes/li.php?id=<?php echo $link1['id']; ?>">Izbiši</a> </li>
                <li> <a class="dropdown-item" href="editL.php?id=<?php echo $link1['id']; ?>">Uredi</a>
          </td>
          </li>
          </ul>
  </div>
  </tr>
<?php
      }
?>
</table>
</div>
</div>
<div width="150" height="150">
  <canvas id="myChart"></canvas>
</div>
<?php
$linkovi1 = array();
$liknovi = "SELECT b.naziv_linka as li,count(a.id) as br  from kandidat a join linkovi b on b.id=a.link group by b.id";
$result = mysqli_query($conn, $liknovi);
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $linkovi1[] = $row;
  }
}
$li = array();
foreach ($linkovi1 as $lin) {

  $li[] = $lin['li'];
}
$br = array();
foreach ($linkovi1 as $lin) {

  $br[] = $lin['br'];
}

?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const data = {
    labels: <?php echo json_encode($li) ?>,

    datasets: [{
      label: 'Linkovi',
      data: <?php echo json_encode($br) ?>,

      backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)'
      ],
      hoverOffset: 4
    }]
  };

  const config = {
    type: 'pie',
    data: data,
    options: {
      maintainAspectRatio: false,
    }
  };
</script>
<script>
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>
<?php
mysqli_close($conn);
?>
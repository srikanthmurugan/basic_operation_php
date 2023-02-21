<table class="content-table">
    <tr>
        <th>SI NO</th>
        <th>USER NAME</th>
        <th>EMAIL</th>
    </tr>
    <?php
    $i = 1;
    foreach($data as $row)
    {
        echo "<tr>";
        echo "<td>".$i."</td>";
        echo "<td>".$row->name."</td>";
        echo "<td>".$row->email."</td>";
        echo "</tr>";
        $i++;
    }
    ?>
</table>
<style>
    .content-table{
        border-collapse: collapse;
        margin: 25px;
        min-width: 700px;
        
    }
    .content-table tr th{
        background-color: #009879;
        color: #ffffff;
        text-align: left;
        font-weight: bold;
    }
    .content-table td{
        padding: 12px 15px;
        
    }
    .content-table tr{
        border-bottom: 1px solid #dddddd;
        border-left:1px solid #009879;
        border-right:1px solid #009879;
        
        
    }
    .content-table tr:nth-of-type(odd){
        background-color: #f3f3f3;
    }
    .content-table tr:last-of-type{
       border-bottom: 2px solid #009879;
    }
</style>
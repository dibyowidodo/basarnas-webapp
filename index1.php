<!DOCTYPE html>
<html>
  <head>
    <title>Drown Victim Database</title>
    <style>
      /* Optional: Add some basic styling to the table */
      table {
        border-collapse: collapse;
        width: 100%;
      }

      th, td {
        text-align: left;
        padding: 8px;
      }

      tr:nth-child(even){background-color: #f2f2f2}
    </style>
  </head>
  <body>
    <h1>Drown Victim Database</h1>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Datetime</th>
          <th>Name</th>
          <th>Detected</th>
          <th>Image</th>
        </tr>
      </thead>
      <tbody>
        <?php
          // Connect to the database
          $conn = mysqli_connect("mysql", "user", "root", "dibyo") or die();

          // Query the drown_victim table for the desired fields
          $sql = "SELECT id, datetime, name, detected, image FROM drown_victim";
          $result = mysqli_query($conn, $sql);

          // Determine the image file format based on the MIME type of the binary image data
          function getImageMimeType($image_data) {
            $mime_type = false;
            if (function_exists('finfo_open')) {
              $finfo = finfo_open(FILEINFO_MIME_TYPE);
              $mime_type = finfo_buffer($finfo, $image_data);
              finfo_close($finfo);
            } else if (function_exists('mime_content_type')) {
              $mime_type = mime_content_type($image_data);
            }
            return $mime_type;
          }

          // Loop through the results and display each row in the table
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["datetime"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["detected"] . "</td>";
            $image_data = $row["image"];
            $image_mime_type = getImageMimeType($image_data);
            echo '<td><img src="data:' . $image_mime_type . ';base64,' . base64_encode($image_data) . '"></td>';
            echo "</tr>";
          }

          // Close the database connection
          mysqli_close($conn);
        ?>
      </tbody>
    </table>
  </body>
</html>

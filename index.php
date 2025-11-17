<?php require __DIR__ . '/db/db.php'; ?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>GariMD — Book Appointment</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<?php include __DIR__ . '/components/navbar.php'; ?>

<main class="wrap">
    <section class="card">
      <h2>Book an Appointment</h2>

      <form id="bookingForm" method="post" action="submit.php" novalidate>
        <div class="grid">
          <label>Name
            <input type="text" name="client_name" required>
          </label>

          <label>Phone
            <input type="text" name="phone" required placeholder="digits only">
          </label>

          <label class="full">Address
            <textarea name="address"></textarea>
          </label>

          <label>Car Registration No
            <input type="text" name="car_license" required>
          </label>

          <label>Car Engine No
            <input type="text" name="car_engine" required placeholder="unique engine number">
          </label>

          <label>Appointment Date
            <input type="date" name="appointment_date" id="appointment_date" required>
          </label>

          <label>Preferred Mechanic
            <select name="mechanic_id" id="mechanic_id" required>
              <option value="">-- Select mechanic --</option>
              <?php
                $stmt = $pdo->query("SELECT id, name FROM mechanics ORDER BY name");
                while ($m = $stmt->fetch()) {
                    echo "<option value='{$m['id']}'>".htmlspecialchars($m['name'])."</option>";
                }
              ?>
            </select>
          </label>
        </div>

        <div id="availability"></div>

        <button class="btn" type="submit">Book Appointment</button>
      </form>
    </section>

    <aside class="card small">
        <h3>Quick Info</h3>
        <p>Each mechanic can work on <strong>4 cars per day</strong>.</p>
        <p>If a mechanic is fully booked, try another mechanic or a different date.</p>
        <p>You may book multiple cars separately.</p>
    </aside>
</main>

<footer class="wrap footer">© GariMD</footer>

<script src="assets/app.js"></script>

</body>
</html>

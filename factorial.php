<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faktorial Calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #667eea, #764ba2);
            color: #fff;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            background-color: rgba(255, 255, 255, 0.9);
        }
        .form-control, .btn-primary {
            border-radius: 10px;
        }
        .btn-primary {
            background-color: #667eea;
            border-color: #667eea;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #764ba2;
            border-color: #764ba2;
        }
    </style>
</head>
<body>
    <div class="container d-flex vh-100">
        <div class="row justify-content-center align-self-center w-100">
            <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                <div class="card shadow-lg p-4">
                    <div class="card-body">
                        <h2 class="text-center text-dark mb-4">Faktorial Calculator</h2>
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="number" class="form-label text-dark">Masukkan angka:</label>
                                <input type="number" class="form-control" id="number" name="number" required min="0" placeholder="Contoh: 5">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Hitung Faktorial</button>
                        </form>

                        <?php
                        if (!function_exists('factorial')) {
                            function factorial($n) {
                                $result = 1;
                                for ($i = 1; $i <= $n; $i++) {
                                    $result *= $i;
                                }
                                return $result;
                            }
                        }

                        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['number'])) {
                            $number = (int)$_POST['number'];
                            if ($number >= 0) {
                                $result = factorial($number);
                                echo "<div class='alert alert-success mt-4 text-center' role='alert'>";
                                echo "Faktorial dari <strong>$number</strong> adalah: <strong>$result</strong>";
                                echo "</div>";
                            } else {
                                echo "<div class='alert alert-danger mt-4 text-center' role='alert'>";
                                echo "Masukkan angka bulat positif atau nol.";
                                echo "</div>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

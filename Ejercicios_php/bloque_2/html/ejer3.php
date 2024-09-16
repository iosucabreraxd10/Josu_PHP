<!DOCTYPE html>
<html>
<body>
<?php
$perfil = [
    'nombre' => 'Juan Pérez',
    'empresa' => 'Zubiri-Manteo',
    'puesto' => 'Analista',
    'experiencia' => 8
];

function generarTarjetaPerfil($perfil) {
    echo "<div style='border: 1px solid #ccc; padding: 15px; width: 300px; margin: 10px; font-family: Arial, sans-serif;'>";
    echo "<h2 style='margin: 0; font-size: 1.5em;'>" . htmlspecialchars($perfil['nombre']) . "</h2>";
    echo "<p style='font-size: 1.2em; color: #555;'>" . htmlspecialchars($perfil['puesto']) . ", " . htmlspecialchars($perfil['experiencia']) . " años</p>";
    echo "<p style='font-size: 1.1em; color: #777;'>Empresa: " . htmlspecialchars($perfil['empresa']) . "</p>";
    echo "</div>";
}

generarTarjetaPerfil($perfil);
?>
</body>
</html>

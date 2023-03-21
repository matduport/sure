<?php
// Get the updated text for each section of the file
$section1Text = $_POST["section1"];
$section2Text = $_POST["section2"];
$section3Text = $_POST["section3"];

// Read the content of the file
$fileContent = file_get_contents("newconfig2");

// Update the relevant sections with the new content
$fileContent = preg_replace("/\[section1\]\s+(.*)\s+\[section2\]/s", "[section1]\n" . $section1Text . "\n[section2]", $fileContent);
$fileContent = preg_replace("/\[section2\]\s+(.*)\s+\[section3\]/s", "[section2]\n" . $section2Text . "\n[section3]", $fileContent);
$fileContent = preg_replace("/\[section3\]\s+(.*)/s", "[section3]\n" . $section3Text, $fileContent);

// Write the updated content back to the file
file_put_contents("newconfig2", $fileContent);

echo "File saved successfully!";
?>
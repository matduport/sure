if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $file_path = '/srv/tftp/newconfig2';
  $config_lines = file($file_path, FILE_IGNORE_NEW_LINES);
  
  // Find the sections to update
  $section1_start = array_search('[section1]', $config_lines);
  $section1_end = array_search('', $config_lines, true, $section1_start);
  $section2_start = array_search('[section2]', $config_lines);
  $section2_end = array_search('', $config_lines, true, $section2_start);
  $section3_start = array_search('[section3]', $config_lines);
  $section3_end = array_search('', $config_lines, true, $section3_start);
  $section4_start = array_search('[section4]', $config_lines);
  $section4_end = array_search('', $config_lines, true, $section4_start);
  
  // Update the relevant settings
 
    $config_lines[$section1_start + 1] = "setting1 = $setting1_value";
    $config_lines[$section2_start + 1] = "setting2 = $setting2_value";
    $config_lines[$section3_start + 1] = "setting3 = $setting3_value";
    $config_lines[$section4_start + 1] = "setting4 = $setting4_value";
  
  // Write the updated configuration back to the file
  file_put_contents($file_path, implode("\n", $config_lines));
}

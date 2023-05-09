<?php
if(isset($_GET['filename'])){
    $filename = $_GET['filename'];

    $dir = 'berkas/';
    $file_path = $dir.$filename;
    
    if(file_exists($file_path)) 
    {
      header('Content-Description: File Transfer');
      header('Content-Type: application/octet-stream');
      header('Content-Disposition: attachment; filename='.basename($file_path));
      header('Content-Transfer-Encoding: binary');
      header('Expires: 0');
      header('Cache-Control: must-revalidate');
      header('Pragma: public');
      header('Content-Length: ' . filesize(($file_path)));
      ob_clean();
      flush();
      readfile(($file_path));
      exit;
    }
}

if(isset($_GET['fileanggaran'])){
  $filename = $_GET['fileanggaran'];

  $dir = 'berkas_anggaran/';
  $file_path = $dir.$filename;
  
  if(file_exists($file_path)) 
  {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($file_path));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize(($file_path)));
    ob_clean();
    flush();
    readfile(($file_path));
    exit;
  }
}

if(isset($_GET['fileperbendaharaan'])){
  $filename = $_GET['fileperbendaharaan'];

  $dir = 'berkas_perbendaharaan/';
  $file_path = $dir.$filename;
  
  if(file_exists($file_path)) 
  {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($file_path));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize(($file_path)));
    ob_clean();
    flush();
    readfile(($file_path));
    exit;
  }
}

if(isset($_GET['fileaset'])){
  $filename = $_GET['fileaset'];

  $dir = 'berkas_aset/';
  $file_path = $dir.$filename;
  
  if(file_exists($file_path)) 
  {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($file_path));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize(($file_path)));
    ob_clean();
    flush();
    readfile(($file_path));
    exit;
  }
}

if(isset($_GET['fileakuntansi'])){
  $filename = $_GET['fileakuntansi'];

  $dir = 'berkas_akuntansi/';
  $file_path = $dir.$filename;
  
  if(file_exists($file_path)) 
  {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($file_path));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize(($file_path)));
    ob_clean();
    flush();
    readfile(($file_path));
    exit;
  }
}
?>
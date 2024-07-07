document.addEventListener("DOMContentLoaded", function () {
  const qrPreview = document.getElementById("qr-preview");

  // Initialize QR scanner
  qrScanner.init(qrPreview);

  // Listen for QR scan result
  qrScanner.onScan((result) => {
    if (result) {
      // Redirect to PHP script with the scanned data
      window.location.href = `process_qr.php?data=${encodeURIComponent(result)}`;
    } else {
      alert("No QR code found. Please try again.");
    }
  });
});

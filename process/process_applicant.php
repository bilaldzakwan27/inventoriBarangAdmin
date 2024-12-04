<?php
include '../functions/function_applicant.php'; // Perbarui jalur jika perlu

session_start(); // Pastikan session dimulai

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    try {
        if ($action === 'create') {
            // Ambil data dari POST
            $data = [
                'applicant_code' => $_POST['applicant_code'],
                'applicant_username' => $_POST['applicant_username'],
                'applicant_passwd' => $_POST['applicant_passwd'], // Password yang di-hash di function_applicant.php
                'applicant_salt' => $_POST['applicant_salt'], // Jika tidak digunakan, bisa dihapus
                'applicant_pin' => $_POST['applicant_pin'],
                'applicant_email' => $_POST['applicant_email'],
                'applicant_handphone1' => $_POST['applicant_handphone1'],
                'applicant_handphone2' => $_POST['applicant_handphone2'],
                'applicant_handphone3' => $_POST['applicant_handphone3'],
                'applicant_verified' => isset($_POST['applicant_verified']) ? $_POST['applicant_verified'] : 0,
                'applicant_trialpaid' => isset($_POST['applicant_trialpaid']) ? $_POST['applicant_trialpaid'] : 0,
                'applicant_verifiedby' => $_POST['applicant_insertby'], // Assuming the creator is also the verifier
                'applicant_insertby' => $_POST['applicant_insertby'],
                'applicant_updateby' => isset($_POST['applicant_updateby']) ? $_POST['applicant_updateby'] : null,
            ];
            createApplicant($data);
            header('Location: ../applicant.php'); // Redirect ke halaman applicant setelah sukses
            exit;
        } elseif ($action === 'update') {
            // Ambil data dari POST
            $data = [
                'applicant_id' => $_POST['applicant_id'],
                'applicant_code' => $_POST['applicant_code'],
                'applicant_username' => $_POST['applicant_username'],
                'applicant_passwd' => $_POST['applicant_passwd'], // Password yang di-hash di function_applicant.php
                'applicant_salt' => $_POST['applicant_salt'], // Jika tidak digunakan, bisa dihapus
                'applicant_pin' => $_POST['applicant_pin'],
                'applicant_email' => $_POST['applicant_email'],
                'applicant_handphone1' => $_POST['applicant_handphone1'],
                'applicant_handphone2' => $_POST['applicant_handphone2'],
                'applicant_handphone3' => $_POST['applicant_handphone3'],
                'applicant_verified' => $_POST['applicant_verified'],
                'applicant_trialpaid' => $_POST['applicant_trialpaid'],
                'applicant_verifiedby' => $_POST['applicant_updateby'], // Assuming the updater is also the verifier
                'applicant_updateby' => $_POST['applicant_updateby'],
            ];
            updateApplicant($data);
            header('Location: ../applicant.php'); // Redirect ke halaman applicant setelah sukses
            exit;
        }
    } catch (Exception $e) {
        // Tangani kesalahan, misalnya dengan menyimpan pesan kesalahan ke session
        $_SESSION['error'] = $e->getMessage();
        header('Location: ../applicant.php'); // Redirect kembali dengan pesan error
        exit;
    }
} elseif (isset($_GET['action']) && $_GET['action'] === 'delete') {
    // Proses penghapusan applicant
    $id = $_GET['id'];
    deleteApplicant($id);
    header('Location: ../applicant.php'); // Redirect setelah hapus
    exit;
}
?>

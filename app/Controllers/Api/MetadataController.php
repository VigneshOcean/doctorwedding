<?php
namespace App\Controllers\Api;

class MetadataController extends ApiController {
    public function getEducation() {
        try {
            $stmt = $this->db->prepare("SELECT id, education FROM education WHERE temp_id = 1 ORDER BY education ASC");
            $stmt->execute();
            $educationList = $stmt->fetchAll();

            return $this->jsonResponse([
                'status' => 'success',
                'data' => $educationList
            ]);
        } catch (\Exception $e) {
            return $this->jsonResponse(['error' => 'Failed to fetch education data'], 500);
        }
    }

    public function getCastes() {
        try {
            $stmt = $this->db->prepare("SELECT id, caste FROM caste ORDER BY caste ASC");
            $stmt->execute();
            $casteList = $stmt->fetchAll();

            return $this->jsonResponse([
                'status' => 'success',
                'data' => $casteList
            ]);
        } catch (\Exception $e) {
            return $this->jsonResponse(['error' => 'Failed to fetch caste data'], 500);
        }
    }

    public function getSubcastes($id = null) {
        if (!$id) {
            $id = $_GET['caste_id'] ?? null;
        }

        if (!$id) {
            return $this->jsonResponse(['error' => 'Caste ID is required'], 400);
        }
        
        try {
            $stmt = $this->db->prepare("SELECT id, subcaste FROM subcaste WHERE caste = :caste_id ORDER BY subcaste ASC");
            $stmt->execute(['caste_id' => $id]);
            $subcasteList = $stmt->fetchAll();

            return $this->jsonResponse([
                'status' => 'success',
                'data' => $subcasteList
            ]);
        } catch (\Exception $e) {
            return $this->jsonResponse(['error' => 'Failed to fetch subcaste data'], 500);
        }
    }
}


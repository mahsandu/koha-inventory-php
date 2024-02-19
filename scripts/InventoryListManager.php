<?php
echo "this is InventoryManager.php";
class inventoryManager {

    private $conn;
    private $inventoryTable = "inventory_list";

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function validate($name, $year) {
        $error = false;
        $errMsg = null;

        if (empty($name)) {
            $errMsg = "Inventory name is required";
            $error = true;
        }

        // Add any additional validation rules here

        $errorInfo = [
            "error" => $error,
            "errMsg" => $errMsg
        ];
        
        return $errorInfo;
    }

    public function create($name, $summary, $year, $yearRange, $found, $missing) {
        $validate = $this->validate($name, $year);
        $success = false;

        if (!$validate['error']) {
            $query = "INSERT INTO " . $this->inventoryTable . " (name, summary, year, year_range, found, missing) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("ssiiss", $name, $summary, $year, $yearRange, $found, $missing);

            if ($stmt->execute()) {
                $success = true;
                $stmt->close();
            }
        }

        $data = [
            'errMsg' => $validate['errMsg'],
            'success' => $success
         ];

         return $data;
    }

    public function get() {
        $data = [];
        $query = "SELECT * FROM " . $this->inventoryTable;
        $result = $this->conn->query($query);

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            $result->free();
        }

        return $data;
    }

    public function getById($id) {
        $data = [];
        $query = "SELECT * FROM " . $this->inventoryTable . " WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $data = $result->fetch_assoc();
            $stmt->close();
        }

        return $data;
    }

    public function updateById($id, $name, $summary, $year, $yearRange, $found, $missing) {
        $validate = $this->validate($name, $year);
        $success = false;

        if (!$validate['error']) {
            $query = "UPDATE " . $this->inventoryTable . " SET name=?, summary=?, year=?, year_range=?, found=?, missing=? WHERE id=?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("ssiissi", $name, $summary, $year, $yearRange, $found, $missing, $id);

            if ($stmt->execute()) {
                $success = true;
                $stmt->close();
            }
        }

        $data = [
            'errMsg' => $validate['errMsg'],
            'success' => $success
        ];

        return $data;
    }

    public function deleteById($id) {
        $query = "DELETE FROM " . $this->inventoryTable . " WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }
}
?>

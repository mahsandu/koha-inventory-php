<?php 
require_once('scripts/InventoryListManager.php');
$inventoryListManager = new inventoryManager($conn);

$msg = '';
$errMsg = '';
$id = null;

if(isset($_GET['id'])) {
  $id = $_GET['id'];
}

/* create inventory list */
if(isset($_POST['create'])) {
  
  $name = $_POST['name'];
  $summary = $_POST['summary'];
  $year = $_POST['year'];
  $yearRange = $_POST['yearRange'];
  $found = $_POST['found'];
  $missing = $_POST['missing'];

  $create = $inventoryListManager->create($name, $summary, $year, $yearRange, $found, $missing);

  if($create['success']) {
    $msg = "Inventory list is saved successfully";
  }

  if($create['errMsg']) {
    $errMsg = htmlspecialchars($create['errMsg']);
  }
  
}

/* update inventory list */
if(isset($_POST['update'])) {
  
  $id = $_GET['id'];
  $name = $_POST['name'];
  $summary = $_POST['summary'];
  $year = $_POST['year'];
  $yearRange = $_POST['yearRange'];
  $found = $_POST['found'];
  $missing = $_POST['missing'];

  $update = $inventoryListManager->updateById($id, $name, $summary, $year, $yearRange, $found, $missing);

  if($update['success']) {
    $msg = "Inventory list is updated successfully";
  }

  if($update['errMsg']) {
    $errMsg = htmlspecialchars($update['errMsg']);
  }
}

/* edit inventory list */
if($id) {
  $inventoryList = $inventoryListManager->getById($id);
}
?>
<div class="row">
    <div class="col-sm-6">
     <h3 class="mb-4">Inventory List Form</h3>
     <?php echo $msg; ?>
    </div>
    <div class="col-sm-6 text-end">
        <a href="dashboard.php?page=inventory-list" class="btn btn-success">Inventory List</a>
    </div>
</div>

<form method="post" action="" >
    <div class="mb-3 mt-3">
      <label for="name">Name</label>
      <input type="text" class="form-control" name="name" value="<?php echo isset($inventoryList['name']) ? htmlspecialchars($inventoryList['name']) : ''; ?>">
    </div>
    <div class="mb-3">
      <label for="summary">Summary</label>
      <input type="text" class="form-control" name="summary" value="<?php echo isset($inventoryList['summary']) ? htmlspecialchars($inventoryList['summary']) : ''; ?>">
    </div>
    <div class="mb-3">
      <label for="year">Year</label>
      <input type="number" class="form-control" name="year" value="<?php echo isset($inventoryList['year']) ? htmlspecialchars($inventoryList['year']) : ''; ?>">
    </div>
    <div class="mb-3">
      <label for="yearRange">Year Range</label>
      <input type="number" class="form-control" name="yearRange" value="<?php echo isset($inventoryList['yearRange']) ? htmlspecialchars($inventoryList['yearRange']) : ''; ?>">
    </div>
    <div class="mb-3">
      <label for="found">Found</label>
      <input type="number" class="form-control" name="found" value="<?php echo isset($inventoryList['found']) ? htmlspecialchars($inventoryList['found']) : ''; ?>">
    </div>
    <div class="mb-3">
      <label for="missing">Missing</label>
      <input type="number" class="form-control" name="missing" value="<?php echo isset($inventoryList['missing']) ? htmlspecialchars($inventoryList['missing']) : ''; ?>">
    </div>

    <button type="submit" class="btn btn-success" name="<?php= $id ? 'update' : 'create'; ?>">Save</button>
</form>

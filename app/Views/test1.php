<?= $this->extend('layouts/main'); ?>
		<?= $this->section('content'); ?>
		<h1 class="h3 mb-3"><strong><?= $title; ?></strong> Menu9999999999999999 </h1>
		<form action="<?= base_url('createTiktest'); ?>" method="post">
        <div class="form-group">
            <label for="inputId">Id</label>
            <input type="text" class="form-control" name="inputId" id="inputId" required>
        </div> <div class="form-group">
            <label for="inputName">Name</label>
            <input type="text" class="form-control" name="inputName" id="inputName" required>
        </div> <div class="form-group">
            <label for="inputLast">Last</label>
            <input type="text" class="form-control" name="inputLast" id="inputLast" required>
        </div> <div class="form-group">
            <label for="inputRemark">Remark</label>
            <input type="text" class="form-control" name="inputRemark" id="inputRemark" required>
        </div>  
        <div class="d-grid gap-2 mt-3">
                        <button class="btn btn-primary" type="submit">Save Data</button>
                    </div>
    </form>
	<table class="table">
        <thead> 
           <th>Id</th> 
           <th>Name</th> 
           <th>Last</th> 
           <th>Remark</th> 
         </thead>
        <tbody>
        <?php foreach($Tiktest as $tiktest ): ?>   
            <tr>  
                <td><?= $tiktest['ID'] ?> </td>  
                <td><?= $tiktest['NAME'] ?> </td>  
                <td><?= $tiktest['LAST'] ?> </td>  
                <td><?= $tiktest['Remark'] ?> </td>  
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
		<?= $this->endSection(); ?>
		
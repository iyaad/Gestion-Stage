<div class="wrapper-page">
	<div class="card-box">
		<div class="panel-heading"> 
			<h3 class="text-center">Finaliser ce stage</h3>
		</div> 
		<div class="panel-body">	
			<?= form_open_multipart(base_url('tuteur/finaliserStage/'.$e.'/'.$s),'class="form-horizontal"') ?>
				<input type="hidden" value="<?= $e ?>" name="etudiantId">
				<div class="form-group <?= form_error('tuteur') ? 'has-error' : '' ?>">
				<label class="col-md-3 control-label" for="tuteur">Tuteur</label>
				<div class="col-md-9">
					<select name="tuteur" class="form-control">
						<option value="">Choisissez un tuteur</option>
						<?php foreach ($tuteurs as $t): ?>
						<option value="<?= $t->tuteurId ?>" <?= set_select('tuteur', $t->tuteurId) ?>><?=$t->nom.' '.$t->prenom ?></option>
						<?php endforeach ?>
					</select>
					<?= form_error('tuteur') ?>
				</div>
			</div>
				<div class="form-group <?= form_error('lettre') ? 'has-error' : '' ?>">
					<label class="col-sm-4 control-label">Convention de stage <br><span class="text-muted">(format .docx ou .pdf )</span></label>
					<div class="col-md-8">
                        <input type="file" class="form-control" name="lettre">
						<?= form_error('lettre') ?>
                    </div>
				</div>
				<div class="form-group text-center m-t-40">
					<button type="submit" class="btn btn-purple waves-effect waves-light">Finaliser</button>
				</div>
			</form>
		</div>
	</div><!-- /.card-box -->
</div>
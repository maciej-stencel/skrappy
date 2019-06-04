	<!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="date" class="font-weight-bold">Data<span class="mandatory">*</span>:</label>
                        <input type="date" class="form-control" id="date" name="date" required />
                    </div>
                    <div class="form-group">
                        <label for="type" class="font-weight-bold">Typ<span class="mandatory">*</span>:</label>
                        <select class="form-control" name="type" id="type" required>
                            <option value="">-- Wybierz --</option>
                            <option value="1">mieszane</option>
                            <option value="2">plastik</option>
                            <option value="3">papier</option>
                            <option value="4">metale - żelazo</option>
                            <option value="5">metale - aluminium</option>
                            <option value="6">metale - miedź</option>
                            <option value="7">metale - inne</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="container_type" class="font-weight-bold">Rodzaj pojemnika<span class="mandatory">*</span>:</label>
                        <select class="form-control" name="container_type" id="container_type" required>
                            <option value="">-- Wybierz --</option>
                            <option value="1">worki</option>
                            <option value="2">kubły</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="qty" class="font-weight-bold">Ilość<span class="mandatory">*</span>:</label>
                        <input type="number" class="form-control" id="qty" name="qty" required />
                    </div>
                    <div class="form-group">
                        <label for="quantity_type" class="font-weight-bold">Rodzaj ilości<span class="mandatory">*</span>:</label>
                        <select class="form-control" name="quantity_type" id="quantity_type" required>
                            <option value="">-- Wybierz --</option>
                            <option value="1">litry</option>
                            <option value="2">kilogramy</option>
                        </select>
                    </div>
					<button type="submit" name="dispose" value="Wyślij" class="btn btn-primary float-right">Wyślij</button>
                </form>
            </div>
        </div>
    </div>
	<!-- /.container -->

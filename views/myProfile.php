<div class="container"><?php
	if ($get->get('mode') == 'edit') { ?>
        <div class="row">
            <div class="col-sm-12">
                <form action="index.php" method="post">
                    <div class="form-group">
                        <label for="firstname" class="font-weight-bold">Imię:</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" />
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="font-weight-bold">Nazwisko:</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" />
                    </div>
                    <div class="form-group">
                        <label for="email" class="font-weight-bold">Email<span class="mandatory">*</span>:</label>
                        <input type="email" class="form-control" id="email" name="email" required />
                    </div>
                    <div class="form-group">
                        <label for="state" class="font-weight-bold">Województwo<span class="mandatory">*</span>:</label>
                        <select class="form-control" id="state" required>
                            <option value="">-- Wybierz --</option>
                            <option value="1">dolnośląskie</option>
                            <option value="2">kujawsko-pomorskie</option>
                            <option value="3">lubelskie</option>
                            <option value="4">lubuskie</option>
                            <option value="5">łódzkie</option>
                            <option value="6">małopolskie</option>
                            <option value="7">mazowieckie</option>
                            <option value="8">opolskie</option>
                            <option value="9">podkarpackie</option>
                            <option value="10">podlaskie</option>
                            <option value="11">pomorskie</option>
                            <option value="12">śląskie</option>
                            <option value="13">świętokrzyskie</option>
                            <option value="14">warmińsko-mazurskie</option>
                            <option value="15">wielkopolskie</option>
                            <option value="16">zachodniopomorskie</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="county" class="font-weight-bold">Powiat<span class="mandatory">*</span>:</label>
                        <input type="text" class="form-control" id="county" name="county" required />
                    </div>
                    <div class="form-group">
                        <label for="city" class="font-weight-bold">Miejscowość:</label>
                        <input type="text" class="form-control" id="city" name="city" />
                    </div>
                    <div class="form-group">
                        <label for="postal_code" class="font-weight-bold">Kod pocztowy:</label>
                        <input type="text" class="form-control" id="postal_code" name="postal_code" />
                    </div>
                    <div class="form-group">
                        <label for="street" class="font-weight-bold">Ulica:</label>
                        <input type="text" class="form-control" id="street" name="street" />
                    </div>
                    <button type="submit" class="btn btn-primary float-right" name="submit" value="Zarejestruj się">
                        Zapisz
                    </button>
                </form>
            </div>
		</div> <?php
	} else { ?>
		<table class="table">
			<thead class="thead-light">
				<tr>
					<th scope="col">#</th>
					<th scope="col">First</th>
					<th scope="col">Last</th>
					<th scope="col">Handle</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th scope="row">1</th>
					<td>Mark</td>
					<td>Otto</td>
					<td>@mdo</td>
				</tr>
				<tr>
					<th scope="row">2</th>
					<td>Jacob</td>
					<td>Thornton</td>
					<td>@fat</td>
				</tr>
				<tr>
					<th scope="row">3</th>
					<td>Larry</td>
					<td>the Bird</td>
					<td>@twitter</td>
				</tr>
			</tbody>
		</table> <?php
	} ?>
    </div>
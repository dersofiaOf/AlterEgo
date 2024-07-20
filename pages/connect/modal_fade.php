<div class="modal fade" id="applicationFormModal" tabindex="-1" aria-labelledby="applicationFormModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form method="post" action="../pages/server_page/application_add.php" class="action-form" name="action-form" onsubmit="return validateActionForm()">
                    <div class="mb-3">
                        <label for="phoneNumber" class="form-label">Введите номер телефона:</label>
                        <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="+7 (___) ___--">
                    </div>
                    <div class="mb-3">
                        <label for="additionalInfo" class="form-label">Расскажите о себе:</label>
                        <textarea class="form-control" id="additionalInfo" name="additionalInfo" rows="5" placeholder="Расскажите нам немного о себе, на каком инструменте хотите научится играть, чего ждёте от нас. Или о своей любимой музыке, которую хотите сыграть!"></textarea>
                    </div>
                    <div class="modal-footer">
                <input type="submit" name="submit" class="btn btn-primary" value="Оставить заявку"></input>
            </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="js/validation.js"></script>
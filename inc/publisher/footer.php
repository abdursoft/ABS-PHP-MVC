<?php
use System\Auth;
?>
<div class="modal fade" id="premiumModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="premiumModelLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <p>Available Balance: <?= Auth::get('publisher')['credits'] ?? 0 ?>৳</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/bkash/deposit" autocomplete="off" id="signinForm" class="abs_login_form" method="post">
                    <div class="form-group">
                        <label for="mobile" class="abs_label">Amount</label>
                        <input type="number" class="form-control" min="100" max="20000" name="amount" id="number" placeholder="100" required>
                    </div>
                    <div class="status text-center"></div>
                    <div class="form-group text-center my-4">
                        <button type="submit" class="mt-4 action-btn approve"><img style="width:100px;height:40px;" src="<?= BASE_URL ?>assets/svg/bkash.svg" alt=""></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<footer class="bg-light text-center py-4 mt-4 abs_">
    <p class="m-0"><?= date('Y') ?>©crickbd.live All rights reserved</p>
</footer>
<script src="<?= BASE_URL ?>assets/js/popper.js"></script>
<script src="<?= BASE_URL ?>assets/js/Bootstrap/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script src="<?= BASE_URL ?>assets/js/crickads.js"></script>

</body>

</html>
<div class="row justify-content-center">
    <div class="col-6">
        <div class="card shadow d-flex justify-content-center mt-5">
            <div class="card-body">
                <h5 class="card-title">Title: <?= $data['book']['title'] ?></h5>
                <img class="card-img-top mb-3" src="<?= BASEURL ?>/img/<?= $data['book']['image'] ?>" alt="Book Image">
                <h6 class="card-subtitle mb-2 text-muted">Author: <?= $data['book']['author'] ?></h6>
                <p class="card-text">Price: Rp. <?= $data['book']['price'] ?>, 00</p>
                <a href="<?= BASEURL ?>/home" class="card-link">Back</a>
            </div>
        </div>
    </div>
</div>
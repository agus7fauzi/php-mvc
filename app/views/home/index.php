<div class="row justify-content-center mt-4">
    <div class="col-lg-6">
        <?php Flasher::flash(); ?>
    </div>
</div>

<div class="row justify-content-center align-items-center mt-4">
    <div class="col-8">
        <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#addForm">
            Add A Book
        </button>
        <h3>List of Book</h3>
        <?php if (count($data['books']) !== 0) : ?>
        <ul class="list-group mt-3">
            <?php foreach ($data['books'] as $book) : ?>
                <li class="list-group-item d-inline-flex align-items-center">
                    <img class="mr-3" src="<?= BASEURL ?>/img/<?= $book['image'] ?>" alt="Book Image">
                    <?= $book['title'] ?>
                    <a href="<?= BASEURL ?>/home/detail/<?= $book['id']; ?>" class="badge badge-primary badge-pill ml-1 ml-auto">Detail</a>
                    <a href="<?= BASEURL ?>/home/deleteABook/<?= $book['id']; ?>" class="badge badge-danger badge-pill ml-1">Delete</a>
                </li>
            <?php endforeach; ?>
        </ul>
        <?php else : ?>
            <p class="alert alert-warning text-center mt-5">Books is Empty!</p>
        <?php endif; ?>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addForm" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle">Add a Book Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL ?>/books/addAbook" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title" class="col-form-label">Title:</label>
                <input type="text" class="form-control" required name="title" id="title">
            </div>
            <div class="form-group">
                <label for="author" class="col-form-label">Author:</label>
                <input type="text" class="form-control" required name="author" id="author">
            </div>
            <div class="form-group">
                <label for="price" class="col-form-label">Price:</label>
                <input type="number" class="form-control" required name="price" id="price">
            </div>
            <div class="custom-file">
                <label for="image" class="custom-file-label">Image:</label>
                <input type="file" class="custom-file-input" required name="image" id="image">
            </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Add</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </form>
    </div>
  </div>
</div>

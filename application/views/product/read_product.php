<?php $this->load->view('templates/header'); ?>

<main id="main" class="main">

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <h5 class="card-title">Product</h5>
              <a href="<?php echo site_url('Product/getCreate'); ?>" class="btn btn-primary btn-sm">
                <i class="bi bi-plus"></i><span>Add</span>
              </a>
            </div>
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col" class="text-center">#</th>
                  <th scope="col" class="text-center">Product ID</th>
                  <th scope="col" class="text-center">Product Name</th>
                  <th scope="col" class="text-center">Price</th>
                  <th scope="col" class="text-center">Category</th>
                  <th scope="col" class="text-center">#</th>
                  <th scope="col" class="text-center">#</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($product as $prd) {?>
                  <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $prd->id_produk ?></td>
                    <td><?php echo $prd->nama_produk ?></td>
                    <td>RP <?php echo $prd->harga ?></td>
                    <td>
                      <?php 
                        $category_list = $this->mCategory->getCategory($prd->kategori_id);
                        foreach ($category_list as $category_item) {
                          echo $category_item->nama_kategori;
                        }
                      ?>
                    </td>
                    <td>
                      <?php echo anchor('Product/getUpdate/' .$prd->id_produk, 
                        '<div class="btn btn-warning btn-sm"><i class="bi bi-pencil-square" style="color:white"></i><span style="color:white">Update</span>
                        </div>') ?>
                    </td>
                    <td class="remove">
                      <div class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal_<?php echo $prd->id_produk; ?>">
                        <i class="bi bi-trash"></i><span>Delete</span>
                      </div>
                    </td>

                    <!-- Modal Delete -->
                    <div class="modal fade" id="deleteModal_<?php echo $prd->id_produk; ?>" tabindex="-1">
                      <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Delete Confirmation</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            Are you sure you want to remove this product?
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <a href="<?php echo site_url('Product/postDelete/' . $prd->id_produk); ?>" class="btn btn-danger">Delete</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</main><!-- End #main -->

<?php $this->load->view('templates/footer'); ?>

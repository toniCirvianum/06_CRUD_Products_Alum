<?php

$text = [];

include("../includes/header.php");
include("../includes/navbar_app.php");

$product = $_SESSION['productToEdit'] ?? null;

if ($product == null) {
    header("Location: ./products.php");
    exit;
}

unset($_SESSION['edit_product']);

?>

<div class="container mt-5">

    <h2 class="text-center mb-4">
        Editar Producte </h2>

    <div class="row justify-content-center">

        <div class="col-md-6">

            <form
                action="../controllers/update_product_controller.php"
                method="post"
                enctype="multipart/form-data">

                <input
                    type="hidden"
                    name="id_product"
                    value="<?= $product['id'] ?>">

                <div class="mb-3">
                    <label class="form-label fw-bold">
                        Nom:
                    </label>

                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        value="<?= $product['name'] ?>"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">
                        Descripció
                    </label>

                    <textarea
                        name="description"
                        class="form-control"
                        rows="4"
                        required><?= $product['description'] ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">
                        Preu
                    </label>

                    <input
                        type="number"
                        name="price"
                        class="form-control"
                        step="0.01"
                        value="<?= $product['price'] ?>"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">
                        Categoria
                    </label>

                    <input
                        type="text"
                        name="category"
                        class="form-control"
                        value="<?= $product['category'] ?>"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">
                        Imatge
                    </label>

                    <div>
                        <img
                            src="../public/images/products/<?= $product['image'] ?>"
                            alt="<?= $product['name'] ?>"
                            class="img-thumbnail"
                            style="max-width: 150px;">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">
                        Canviar imatge
                    </label>

                    <input
                        type="file"
                        name="image"
                        class="form-control"
                        accept="image/*">

                    <div class="form-text">
                        Deixa aquest camp buit per mantenir la imatge actual
                    </div>
                </div>

                <div class="d-flex justify-content-center gap-2">

                    <input
                        type="submit"
                        class="btn btn-warning"
                        value="Actualitza producte">

                    <a
                        href="./products.php"
                        class="btn btn-secondary">
                        Cancel·la
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

<?php
include("../includes/footer.php");
?>
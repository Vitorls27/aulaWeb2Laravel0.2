<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  </head>
  <body>
  <div class="container">
    <h1>Listagem de Usuários <?php echo e(request()->id); ?></h1>
    <form action="<?php echo e(action('App\Http\Controllers\UsuarioController@search')); ?>" method="post">
        <?php echo csrf_field(); ?>
      <div class="row">
        <div class="col-2">
          <select name="campo" class="form-select">
            <option value="nome">Nome</option>
            <option value="telefone">Telefone</option>
          </select>
        </div>
        <div class="col-4">
          <input type="valor" class="form-control" placeholder="Pesquisar" name="valor" />
        </div>
        <div class="col-6">
          <button class="btn btn-primary" type="submit">
            <i class="fa-solid fa-magnifying-glass"></i> Buscar
          </button>
          <a class="btn btn-success" href='<?php echo e(action("App\Http\Controllers\UsuarioController@create")); ?>' ><i class="fa-solid fa-plus"></i> Cadastrar</a>
        </div>
      </div>
    </form>
      <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nome</th>
          <th scope="col">Telefone</th>
          <th scope="col">Email</th>
          <th scope="col">Categoria</th>
          <th scope="col"></th>
          <th scope="col"></th>
        </tr>
      </thead> <!--  composer install
                     php artisan migrate
      -->
      <tbody>
         <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td scope='row'><?php echo e($item->id); ?></td>
              <td><?php echo e($item->nome); ?></td>
              <td><?php echo e($item->telefone); ?></td>
              <td><?php echo e($item->email); ?></td>
              <td><?php echo e($item->categoria->nome); ?></td>
              <td><a href="<?php echo e(action('App\Http\Controllers\UsuarioController@edit', $item->id)); ?>"><i class='fa-solid fa-pen-to-square' style='color:orange;'></i></a></td>
              <td><a href="<?php echo e(action('App\Http\Controllers\UsuarioController@destroy', $item->id)); ?>"
                      onclick='return confirm("Deseja Excluir?")'
              ><i class='fa-solid fa-trash' style='color:red;'></i></a></td>
            </tr>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  </body>
</html>
<?php /**PATH C:\laragon\www\laravel_php2\resources\views/UsuarioList.blade.php ENDPATH**/ ?>
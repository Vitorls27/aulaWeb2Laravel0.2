<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  </head>
  <?php
    if(!empty(Request::route('id'))){
        $action = action("App\Http\Controllers\UsuarioController@update",$usuario->id);
    } else {
        $action = action("App\Http\Controllers\UsuarioController@store");
    }
  ?>
  <body>
    <div class="container">
      <h1>Formulário Usuário</h1>
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?> </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action='<?php echo e($action); ?>' method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="id" value="<?php if(!empty(old('id'))): ?> <?php echo e(old('id')); ?> <?php elseif(!empty($usuario->id)): ?> <?php echo e($usuario->id); ?> <?php else: ?> <?php echo e(''); ?> <?php endif; ?>"  /><br>
            <div class="col-3">
              <label class="form-label">Nome</label><br>
              <input type="text" class="form-control" name="nome" value="<?php if(!empty(old('nome'))): ?> <?php echo e(old('nome')); ?> <?php elseif(!empty($usuario->nome)): ?> <?php echo e($usuario->nome); ?> <?php else: ?> <?php echo e(''); ?> <?php endif; ?>" /><br>
            </div>
            <div class="col-3">
             <label class="form-label">Telefone</label><br>
                <input type="text" class="form-control" name="telefone" value="<?php if(!empty(old('telefone'))): ?> <?php echo e(old('telefone')); ?> <?php elseif(!empty($usuario->telefone)): ?> <?php echo e($usuario->telefone); ?> <?php else: ?> <?php echo e(''); ?> <?php endif; ?>" /><br>
            </div>
            <div class="col-3">
             <label class="form-label">E-mail</label><br>
                <input type="email" class="form-control" name="email" value="<?php if(!empty(old('email'))): ?> <?php echo e(old('email')); ?> <?php elseif(!empty($usuario->email)): ?> <?php echo e($usuario->email); ?> <?php else: ?> <?php echo e(''); ?> <?php endif; ?>" /><br>
            </div>
            <div class="col-3">
                <label class="form-label">Categoria</label><br>
                <select name="categoria_id" class="form-select">
                    <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($item->id); ?>"><?php echo e($item->nome); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <?php
            !empty($usuario->imagem) ? $nome_imagem = $usuario->imagem : $nome_imagem = 'sem_imagem.jpg';
            ?>
            <div class="col-6">
                <label class="form-label">Imagem</label><br>
                <input type="file" class="form-control" name="imagem" /><br>
                <img src="/storage/<?php echo e($nome_imagem); ?>" width="300px">
            </div>

            <button class="btn btn-success" type="submit">
                <i class="fa-solid fa-save"></i> Salvar
            </button>
            <a href='<?php echo e(action("App\Http\Controllers\UsuarioController@index")); ?>' class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i> Voltar</a>
        </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  </body>
</html>
<?php /**PATH C:\laragon\www\laravel_php2\resources\views/UsuarioForm.blade.php ENDPATH**/ ?>
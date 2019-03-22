<?php $__env->startSection('content'); ?>



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-100%">
            <div class="card">
                <div class="card">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>


                    <?php endif; ?>
                        <div class="row justify-content-center">
                    You are logged in!
                        </div>


                </div>
                <?php if(count($documents)==0): ?>
                    <div class="card-body">
                    <div class="row justify-content-center">
                    <p>You don't have any documents uploaded here.</p>
                    </div>
                       <div class="row justify-content-center">
                           <a href="/documents/create" class="btn btn-primary">Upload new document</a>
                       </div>

                <?php else: ?>



                <table class="table table-striped">
                    <tr>
                        <td>List of your uploaded documents:</td>
                        <td></td>
                        <td></td>
                    </tr>

                <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>

                                <h3><?php echo e($document->title); ?></h3>
                               Document type: <br>
                                <ul><li><?php echo e($document->doc_type); ?> </li></ul>

                               <div class="decorate"><a href="storage/doc_upload/<?php echo e($document->doc_upload); ?>" download="<?php echo e($document->doc_upload); ?>"><?php echo e($document->doc_upload); ?></a> </div> <br>

                                <small>Written on <?php echo e($document->created_at); ?> by <?php echo e($document->user->name); ?></small><br>
                            </td>
                            <td>
                                <a href="/documents/<?php echo e($document->id); ?>/edit"><button type="button" class="btn btn-primary">Edit</button></a>
                            </td>
                            <td>


                                <!-- Bootstrap code/Modal Window -->

                                <button type="button" class="btn btn-danger btn-submit" data-toggle="modal" data-target="#myModal<?php echo e($document->id); ?>">Delete</button>

                                <!-- Modal content-->

                                <div id="myModal<?php echo e($document->id); ?>" class="modal fade" role="dialog">
                                    <div class="modal-dialog">


                                        <div class="modal-content">
                                            <div class="modal-header">

                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title"> </h4>
                                            </div>
                                            <div class="modal-body">
                                                <h5>Are you sure you want to delete this document ?</h5>

                                            </div>
                                            <div class="modal-footer">
                                                <?php echo Form::open(['action'=> ['FunctionController@destroy',$document->id], 'method' =>'POST', 'class' => 'pull-right']); ?>

                                                <?php echo e(Form::hidden('_method', 'DELETE')); ?>

                                                <?php echo e(Form::submit('Yes', ['class'=> 'btn btn-primary'])); ?>

                                                <?php echo Form::close(); ?>

                                                <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>

                                            </div>
                                        </div>

                                    </div>
                                </div>



                            </td>
                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                    <div class="row justify-content-center">
                        <a href="/documents/create" class="btn btn-primary">Upload new document</a>
                    </div>

                </table>


                        <?php endif; ?>

            </div>
        </div>
    </div>

</div>
</div>

            </td>
        </tr>
    </table>

</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
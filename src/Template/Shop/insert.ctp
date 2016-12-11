<div class="col-lg-8">
<div class="articles form large-9 medium-8 columns content">
    <?= $this->Form->create($article,['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Add Product') ?></legend>
        <?php
        echo $this->Form->input('prductname', [ "class" => "form-control"]);

        echo $this->Form->input('domainname', [ "class" => "form-control"]);
        echo $this->Form->input('phone', [ "class" => "form-control"]);

        echo $this->Form->file('file',[ "class" => "form-control"]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ["class" => "btn btn-primary"]) ?>
    <?= $this->Form->end() ?>
</div>
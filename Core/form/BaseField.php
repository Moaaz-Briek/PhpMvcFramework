<?php

namespace app\Core\form;

use app\Core\Model;
abstract class BaseField
{
    public Model $model;
    public string $attribute;
    public function __construct(Model $model, string $attribute)
    {
        $this->model = $model;
        $this->attribute = $attribute;
    }

    public function __toString(): string
    {
        // TODO: Implement __toString() method.
        return sprintf('
        <div class="col-sm-10">
            <label class="col-sm-2 col-form-label">%s</label>
            %s
            <div class="invalid-feedback">
                %s
            </div>
        </div>       

        ',
     $this->model->getLabel($this->attribute) ?? $this->attribute,
            $this->renderInput(),
            $this->model->getFirstError($this->attribute),
        );
    }

    abstract public function renderInput(): string;
}
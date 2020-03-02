<?php
class NestedEntities
{
    private int $indice = 0;
    private string $objNome = '';
    private string $campoNome = '';
    private string $root = '';

    public function roots(): string
    {
        return $this->itemNum . "\\" . $this->objNome . "\\" . $this->campoNome . "\n";
    }

    private function isAssoc(array $arr)
    {
        if (array() === $arr) {
            return false;
        }

        return array_keys($arr) !== range(0, count($arr) - 1);
    }

    public function parseFields($objeto)
    {
        if (!is_string($objeto)) {

            foreach ($objeto as $key => $value) {

                if ($this->isAssoc($objeto)) {
                    if (is_array($value)) {
                        if (count($objeto) === 1) {
                            $this->objNome = "@" . $key . $this->indice;
                        } else {
                            $this->campoNome = $key . $this->indice;
                        }
                        $this->parseFields($value);
                    } else {
                        $this->campoNome = $key;
                        print_r($this->root . "\\" . $this->objNome . "\\" . $this->campoNome . " = " . $value . "\n");
                    }
                } else {
                    $this->indice = ($key + 1);

                    if (is_array($value)) {
                        $this->parseFields($value);
                    } else {
                        print_r($this->root . "\\" . $this->objNome . "\\" . $this->campoNome . " = " . $value . "\n");
                    }
                }
            }
        }
    }
}

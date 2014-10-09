<?php
class Book implements NameInterface, SizeInterface {
    use NameTrait, SizeTrait;
}

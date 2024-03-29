<?php

namespace App\src\app\models;

class CartModels extends BaseModels
{

    public function __construct()
    {
        $this->tableName = "cart";
        $this->subTableName = ["subcard", "size", "sizedefault", "product", "subproduct"];
    }

    public function getSubCartById($IdSubCart)
    {
        return $this->con_return(
            $this->con_QueryReadOne("
                SELECT 
                    sc.IdSubCart, sc.IdCart,sc.QuantityCardProduct, sc.QuantitySubCardProduct, sc.Note,
                    s.PriceSize, s.SEO,s.ImageSize,
                    sd.SizeDefault,
                    p.NameProduct, p.QuantityProduct,
                    sp.IdSubProduct, sp.NameSubProduct, sp.PriceSubProduct,sp.ImageSubProduct, sp.QuantilySubProduct
                FROM {$this->subTableName[0]} sc
                JOIN {$this->subTableName[1]} s ON sc.IdSize = s.IdSize 
                JOIN {$this->subTableName[2]} sd ON sd.IdSizeDefault = s.IdSizeDefault  
                JOIN {$this->subTableName[3]} p ON p.IdProduct = sc.IdProduct   
                LEFT JOIN {$this->subTableName[4]} sp ON sp.IdSubProduct = sc.IdSubProduct 
                AND sc.IdSubProduct IS NOT NULL
                WHERE sc.IdSubCart = '$IdSubCart'

            ")
        );
    }

    public function getIdProduct($IdSubCart)
    {
        $this->tableName = "subcard";
        return $this->con_return($this->con_QueryReadOne($this->con_find("IdSubCart", $IdSubCart, ["IdProduct", "IdSubProduct"])->sqlBuilder));
    }

    public function getAllCart($IdAccount)
    {
        return $this->con_return(
            $this->con_QueryReadAll("
                SELECT 
                    c.*,
                    sc.IdSubCart, sc.QuantityCardProduct, sc.QuantitySubCardProduct, sc.Note, sc.IdProduct,
                    s.PriceSize, s.SEO, s.ImageSize, 
                    sd.SizeDefault,
                    p.NameProduct, p.QuantityProduct,
                    sp.IdSubProduct, sp.NameSubProduct, sp.PriceSubProduct, sp.QuantilySubProduct, sp.ImageSubProduct 
                FROM cart c
                JOIN {$this->subTableName[0]} sc ON sc.IdCart = c.IdCart
                JOIN {$this->subTableName[1]} s ON sc.IdSize = s.IdSize 
                JOIN {$this->subTableName[2]} sd ON sd.IdSizeDefault = s.IdSizeDefault  
                JOIN {$this->subTableName[3]} p ON p.IdProduct = sc.IdProduct   
                LEFT JOIN {$this->subTableName[4]} sp ON sp.IdSubProduct = sc.IdSubProduct 
                AND sc.IdSubProduct IS NOT NULL
                WHERE c.IdAccount = '$IdAccount'
            ")
        );
    }
    public function  bill($IdAccount)
    {
        $qualitySubProduct = 0;
        $totailSubPriceProduct = 0;
        $qualityProduct = 0;
        $totailPriceProduct = 0;
        $ServiceCharge = 0.01;
        $VAT = 0.1;

        $dataCart = $this->getAllCart($IdAccount);
        foreach ($dataCart as $value) {
            if ($value["QuantitySubCardProduct"] !== NULL) {
                $qualitySubProduct +=  $value["QuantitySubCardProduct"];
                $totailSubPriceProduct +=  $value["QuantitySubCardProduct"] * $value["PriceSubProduct"];
            }
            if ($value["SEO"] !== NULL) {
                $totailPriceProduct +=
                    ($value["QuantityCardProduct"] * $value["QuantityCardProduct"])
                    - ($value["QuantityCardProduct"] * ($value["SEO"] / 100));
            } else {

                $totailPriceProduct += $value["QuantityCardProduct"] * $value["PriceSize"];
            }
            $qualityProduct += $value["QuantityCardProduct"];
        }
        return [
            "totailPrice" => $totailPriceProduct + $totailSubPriceProduct,
            "VAT" => ($totailPriceProduct + $totailSubPriceProduct) * $VAT,
            "ServiceCharge" => ($totailPriceProduct + $totailSubPriceProduct) * $ServiceCharge,
            "QualitySubProduct" => $qualitySubProduct,
            "PriceSubProduct" => $totailSubPriceProduct,
            "QualityProduct" => $qualityProduct,
            "PayThePrice" => ($totailPriceProduct + $totailSubPriceProduct)
                + (($totailPriceProduct + $totailSubPriceProduct) * $VAT)
                + (($totailPriceProduct + $totailSubPriceProduct) * $ServiceCharge)
        ];
    }
    public function  billRequest($data)
    {
        $qualitySubProduct = 0;
        $totailSubPriceProduct = 0;
        $qualityProduct = 0;
        $totailPriceProduct = 0;
        $ServiceCharge = 0.01;
        $VAT = 0.1;

        foreach ($data as $value) {
            if ($value["QuantitySubCardProduct"] !== NULL) {
                $qualitySubProduct +=  $value["QuantitySubCardProduct"];
                $totailSubPriceProduct +=  $value["QuantitySubCardProduct"] * $value["PriceSubProduct"];
            }
            if ($value["SEO"] !== NULL) {
                $totailPriceProduct +=
                    ($value["QuantityCardProduct"] * $value["QuantityCardProduct"])
                    - ($value["QuantityCardProduct"] * ($value["SEO"] / 100));
            } else {

                $totailPriceProduct += $value["QuantityCardProduct"] * $value["PriceSize"];
            }
            $qualityProduct += $value["QuantityCardProduct"];
        }
        return [
            "totailPrice" => $totailPriceProduct + $totailSubPriceProduct,
            "VAT" => ($totailPriceProduct + $totailSubPriceProduct) * $VAT,
            "ServiceCharge" => ($totailPriceProduct + $totailSubPriceProduct) * $ServiceCharge,
            "QualitySubProduct" => $qualitySubProduct,
            "PriceSubProduct" => $totailSubPriceProduct,
            "QualityProduct" => $qualityProduct,
            "PayThePrice" => ($totailPriceProduct + $totailSubPriceProduct)
                + (($totailPriceProduct + $totailSubPriceProduct) * $VAT)
                + (($totailPriceProduct + $totailSubPriceProduct) * $ServiceCharge)
        ];
    }
    public function deleteProductInCart($id, $tableName)
    {
        $this->tableName = $tableName;
        $request = $tableName === "subcard" ? "IdSubCart" : "IdCart";
        $deleteSubCart = $this->con_delete($this->tableName, $request, $id);
        if ($deleteSubCart["message"] === true) {
            return [
                "message" => "Xóa sản phẩm thành công"
            ];
        } else {
            return [
                "message" => "Cú pháp không hợp lệ"
            ];
        }
    }


    public function addSubProductInCart($id, $data)
    {
        extract($data);
        $this->tableName = "subcard";
        $newData = ["IdSubProduct" => $IdSubProduct, "QuantitySubCardProduct" => $quantity];
        $retult = $this->con_return($this->con_update("IdSubCart", $id, $newData));
        $this->tableName = "cart";
        return $retult;
    }

    public function updateCart($column, $id, $data)
    {
        $this->tableName = $this->subTableName[0];
        return $this->con_return($this->con_update($column, $id, $data));
    }
}
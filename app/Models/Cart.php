<?php

namespace App\Models;

use PhpParser\Node\Expr\Cast\Object_;

class Cart
{
    public $Items;
    public $OffersItems;
    public $TotalQty = 0;
    public $TotalPrice = 0;

    public function __construct($OldCart)
    {
        // dd($OldCart);
        if($OldCart)
        {
            $this->Items = $OldCart->Items;
            $this->OffersItems = $OldCart->OffersItems;
            $this->TotalQty = $OldCart->TotalQty;
            $this->TotalPrice = $OldCart->TotalPrice;
        }
        else{
            $this->Items = [];
            $this->OffersItems = [];
        }
        // dd($this->Items,"   ",$this->OffersItems);
    }
    
    public function add($Item, $Id)
    {
        // dd("Adding Item", $Item, "Old Items Is " , $this->Items , " and offers ",$this->OffersItems);
        $StoredItem = ['Qty' => 0 ,'Price' => $Item->Price ,'Item' => $Item];
        if($this->Items)
        {
            if(isset($this->Items[$Id]))
            {
                $StoredItem = $this->Items[$Id];
                $this->TotalPrice -= $this->Items[$Id]['Price'];
            }
        }
        $StoredItem['Qty']++;

        $StoredItem['Price'] = $Item->Price * $StoredItem['Qty'];

        $this->Items[$Id] = $StoredItem;
        $this->TotalPrice += $StoredItem['Price'];
        $this->TotalQty ++;
    }

    public function remove($Item, $Id)
    {        
        //unset($this->Items[$Id]);
        
        $ItemToBeRemoved = $this->Items[$Id];

        $this->TotalPrice -= ($ItemToBeRemoved['Qty'] * $ItemToBeRemoved['Price']);
        $this->TotalQty--;

        unset($this->Items[$Id]);

        // $this->Items?->forget($Id);
    }
    public function AddOffer($Item, $Id)
    {
        // dd("Adding Offer", $Item, "Old Items Is " , $this->Items , " and offers ",$this->OffersItems);

        $StoredItem = ['Qty' => 0 ,'Price' => $Item->Total ,'Item' => $Item];
        if($this->OffersItems)
        {
            if(isset($this->OffersItems[$Id]))
            {
                $StoredItem = $this->OffersItems[$Id];
                $this->TotalPrice -= $this->OffersItems[$Id]['Price'];
            }
        }
        $StoredItem['Qty']++;

        $StoredItem['Price'] = $Item->Total * $StoredItem['Qty'];

        $this->OffersItems[$Id] = $StoredItem;
        $this->TotalPrice += $StoredItem['Price'];
        $this->TotalQty ++;
    }

    public function RemoveOffer($Item, $Id)
    {
        
        $ItemToBeRemoved = $this->OffersItems[$Id];
        
        $this->TotalPrice -= ($ItemToBeRemoved['Qty'] * $ItemToBeRemoved['Price']);
        $this->TotalQty--;
        unset($this->OffersItems[$Id]);

        // $this->OffersItems?->forget($Id);
    }

}

<?php 

class Shell {
    protected
    $ppn = 0.1,
    $SSuper = 14530,
    $SDieselExtra = 15610,
    $SVPower = 15360,
    $SVPowerDiesel = 16140,
    $SVPowerNitroP = 14630;

    protected 
    $fType,
    $quantity,
    $tPrice;

    // The type of fuels
    public function __construct($fuel, $quantity) {
        $this->fType = $fuel;
        $this->quantity = $quantity;
        // Type of fuel
        switch ($fuel) {
            case "Shell Super":
                $this->tPrice = ($this->SSuper * $quantity) + ($this->SSuper * $quantity * $this->ppn);
                break;
            case "Shell Diesel Extra":
                $this->tPrice = ($this->SDieselExtra * $quantity) + ($this->SDieselExtra * $quantity * $this->ppn);
                break;
            case "Shell V Power":
                $this->tPrice = ($this->SVPower * $quantity) + ($this->SVPower * $quantity * $this->ppn);
                break;
            case "Shell V Power Diesel":
                $this->tPrice = ($this->SVPowerDiesel * $quantity) + ($this->SVPowerDiesel * $quantity * $this->ppn);
                break;
            case "Shell Power Nitro Plus":
                $this->tPrice = ($this->SVPowerNitroP * $quantity) + ($this->SVPowerNitroP * $quantity * $this->ppn);
                break;
        }
    }

    // Get receipt of payment
    public function getReceipt() {
        $receipt = "\n";
        $receipt .= "Fuel Type: " . $this->fType . "\n";
        $receipt .= "Quantity: " . $this->quantity . " liters\n";
        $receipt .= "Total Price: Rp" . number_format($this->tPrice, 2) . "\n";
        return $receipt;
    }
}

// Example usage1
// $shell = new Shell("Shell Power Nitro Plus", 1);
// echo $shell->getReceipt();

?>

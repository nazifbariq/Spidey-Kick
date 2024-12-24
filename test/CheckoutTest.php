<?php
use PHPUnit\Framework\TestCase;

class CheckoutTest extends TestCase
{
    public function testSubTotalCalculation()
    {
        $rowsobat = [
            ['harga' => 5, 'quantity' => 2],
            ['harga' => 10, 'quantity' => 3],
        ];
    
        $grand_total = 10; // Initialize the grand total
        $sub_total = 0;
    
        foreach ($rowsobat as $rowobat) {
            $sub_total = $rowobat['harga'] * $rowobat['quantity']; // Calculate subtotal for each item
            $grand_total += $sub_total; // Add subtotal to the grand total
            var_dump($sub_total, $grand_total);
        }
    
        $this->assertEquals(60, $grand_total);
    }
}
?>
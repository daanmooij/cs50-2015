#include <stdio.h>
#include <cs50.h>
#include <math.h>

int main(void)
{
    int amount[4] = {25,10,5,1};
    int num_coins = 0;
    float change;
    
    printf("O hai! ");
    
    do
    {
        printf("How much change is owed? \n");
        change = GetFloat();
    }
    while(change <= 0);
    
    int cents = round(change * 100);
    
    for(int i = 0; i <= 3; i++)
    {
        while(cents >= amount[i])
        {
            num_coins += 1;
            cents -= amount[i];
        }
    }
    
    printf("%d\n", num_coins);
}

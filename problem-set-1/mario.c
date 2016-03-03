#include <stdio.h>
#include <cs50.h>

int main(void)
{
    int height;
    
    do
    {
        printf("height: ");
        height = GetInt();
    }
    while(height < 0 || height > 23);
    
    int space = height - 1;
    int hash = 2;
    
    for(int i = 0; i < height; i++)
    {  
        for(int x = 0; x < space; x++)
        {
            printf(" ");
        }
        for(int y = 0; y < (hash); y++)
        {
            printf("#");  
        }
        hash += 1;
        space -= 1;
        
        printf("\n");
    }
}

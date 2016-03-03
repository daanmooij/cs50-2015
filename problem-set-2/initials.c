#include <stdio.h>
#include <cs50.h>
#include <ctype.h>
#include <string.h>

int main(int argc, string argv[])
{
    string name;    
    int nameLength;
    
    do
    {
        name = GetString();
        nameLength = strlen(name);
    }
    while(nameLength < 1);    
    
    
    for(int i = 0; i < nameLength; i++)
    {
        if (i == 0)
        {
            printf("%c", toupper(name[i]));
        }
        
        else if (name[i] == 32)
        {
            i++;
            printf("%c", toupper(name[i]));
        }
    }
    
    printf("\n");
 
}

#include <stdio.h>
#include <cs50.h>
#include <stdlib.h>
#include <string.h>
#include <ctype.h>

int main(int argc, string argv[])
{
    
    if (argc != 2)
    {
        printf("Error: No command-line argument\n");
        return 1;
    }
    else
    {    
        string arg = argv[1];
        int k = atoi(arg);
  
        string plaintext = GetString();
        
        for(int i = 0, n = strlen(plaintext); i < n; i++)
        {
            if (islower(plaintext[i]))
            {
                int ascii = (int) plaintext[i];
                int x = ((ascii - 97) + k) % 26;
                int newval = x + 97;
                printf("%c", newval);
            }
            else if (isspace(plaintext[i]))
            {
                printf(" ");
            }
            else if (isupper(plaintext[i]))
            {
                int ascii = (int) plaintext[i];
                int x = ((ascii - 65) + k) % 26;
                int newval = x + 65;
                printf("%c", newval);
            }
            else
            {
                printf("%c", plaintext[i]);
            }
        }
        printf("\n");
    }
    
    return 0;
}

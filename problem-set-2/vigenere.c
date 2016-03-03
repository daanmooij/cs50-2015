#include <stdio.h>
#include <cs50.h>
#include <ctype.h>
#include <string.h>

int main(int argc, string argv[])
{
    if (argc != 2)
    {
        printf("Error: Needs 1 argument\n");
        return 1;
    }
    
    for (int i = 0, n = strlen(argv[1]); i < n; i++)
    {
        if (!isalpha(argv[1][i]))
        {
            printf("Error: Key needs to be only chars\n");
            return 1;
        }
    }
    
    int numkey = strlen(argv[1]);
    int keys[numkey];
    int count = 0;
    
    for (int i = 0; i < numkey; i++)
    {
        keys[i] = toupper(argv[1][i]) - 65;
    }
    
    string plaintext = GetString();
    int textlen = strlen(plaintext);
    
    for (int i = 0; i < textlen; i++)
    {
        if (!isalpha(plaintext[i]))
        {
            printf("%c", plaintext[i]);
        }
        else
        {
            if (islower(plaintext[i]))
            {
                int x = (((plaintext[i] - 97) + keys[count]) % 26) + 97;
                printf("%c", x);
                count++;
                count %= numkey;
            }
            else
            {
                int x = (((plaintext[i] - 65) + keys[count]) % 26) + 65;
                printf("%c", x);
                count++;
                count %= numkey;
            }
        }
    }
    
    printf("\n");
    return 0;
}

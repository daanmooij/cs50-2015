/**
 * recover.c
 *
 * Computer Science 50
 * Problem Set 4
 *
 * Recovers JPEGs from a forensic image.
 */

#include <stdio.h>
#define BLOCK_SIZE 512
#define LOW_HEX_VAL 224 // 0xe0
#define UP_HEX_VAL 239  // 0xef

unsigned char buffer[BLOCK_SIZE];

int main(int argc, char* argv[])
{    
    // Open memory card file
    FILE* infile = fopen("card.raw", "r");
    FILE* outfile = NULL;
    
    if (infile == NULL)
    {
        fclose(infile);
        printf("Could not open file\n");
        return 1;
    }
    
    int numOfJPG = 0;
    char nameOfJPG[10];
    
    // Check for End Of File and read into buffer
    while(fread(buffer, sizeof(char), BLOCK_SIZE, infile) == BLOCK_SIZE)
    {
        // Check for JPG signature
        if(buffer[0] == 0xff && buffer[1] == 0xd8 && buffer[2] == 0xff)
        { 
            for(int i = LOW_HEX_VAL; i <= UP_HEX_VAL; i++)
            {
                if(buffer[3] == i)
                {   
                    // Check for end of JPG
                    if(outfile != NULL)
                    {
                        fclose(outfile);
                    }
                                
                    sprintf(nameOfJPG, "%03d.jpg", numOfJPG++);
                    outfile = fopen(nameOfJPG, "a");                     
                    fwrite(buffer, sizeof(char), BLOCK_SIZE, outfile);            
                }
            }
        }
        else
        {
            if(outfile != NULL)
            {
                fwrite(buffer, sizeof(char), BLOCK_SIZE, outfile);
            }
        }
    }
    
    fclose(outfile);
    fclose(infile);
    return 0;
}

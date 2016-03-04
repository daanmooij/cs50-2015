/**
 * helpers.c
 *
 * Computer Science 50
 * Problem Set 3
 *
 * Helper functions for Problem Set 3.
 */
       
#include <cs50.h>

#include "helpers.h"

/**
 * Returns true if value is in array of n values, else false.
 */
bool search(int value, int values[], int n)
{
    int beginning = 0;
    int ending = n - 1;
   
    while(ending >= beginning){
        int middle = (beginning + ending) / 2;
        if(values[middle] == value){
            return true;
        } else if(values[middle] > value){
            ending = middle - 1;
        } else{
            beginning = middle + 1;
        }
    }
    return false;
}

/**
 * Sorts array of n values.
 */
void sort(int values[], int n)
{
    int temp;
    for(int i = 0; i < n; i++){
        int smIndex = i;
        for(int j = i + 1; j < n; j++){
            if(values[smIndex] > values[j]){
                smIndex = j;
            }
        }  
        temp = values[smIndex];
        values[smIndex] = values[i];
        values[i] = temp; 
    }
}

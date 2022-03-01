// See https://aka.ms/new-console-template for more information
namespace EX1
{
    class Program
    {
        static void Main(string[] args)
        {
            Dice dice1 = new Dice();
            Console.Write("Amount of sides of the dice: ");
            int sides = int.Parse(Console.ReadLine());

            Console.Write("Your guessing number: ");
            int guess = int.Parse(Console.ReadLine());

            Console.WriteLine($"The result was: {dice1.Roll()}");

            if (dice1.Roll() == guess)
            {
                Console.WriteLine("right");
            }
            else Console.WriteLine("wrong");
        }
    }
}


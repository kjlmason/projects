package edu.fau.COT4930;

public class Player extends TicTacToe
{
	private String name;
	int isPlayer = 0; //Either 1 or 2
	String Symbol = ""; //Either X or O

	/**
		The constructor creates a default Player object.
	*/
	public Player()
	{
		name = "";
	}
	/**
		The constructor creates a Player object with the specified name.
		@param n represents the name of the Player.
	*/
	public Player(String n)
	{
		name = n;
	}

	/**
		Method to retrieve the name of the player.
		@return a String representing the name of the Player.
	*/
	public String getName()
	{
		return name;
	}

	/**
		Method to set the Players name.
		@param n represents the name of the Player.
	*/
	public void setName(String n)
	{
		name = n;
	}
	
	public void setPlayer(int n)
	{
		isPlayer = n;
		if(n == 1)
		{
			Symbol = "X";
		}
		else if(n == 2)
		{
			Symbol = "O";
		}
	}
}
